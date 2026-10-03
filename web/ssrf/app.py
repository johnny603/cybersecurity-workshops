from flask import Flask, request, jsonify, abort, send_file,send_from_directory
import os
from functools import wraps
import requests

app = Flask(__name__)
INTERNAL_IPS = ('127.0.0.1', '::1', 'localhost')

def internal_only(f):
	@wraps(f)
	def decorated_function(*args, **kwargs):
		# Allow requests only from IPv4 and IPv6 localhost loopbacks
		if request.remote_addr not in INTERNAL_IPS:
			abort(403)  # Forbidden
		return f(*args, **kwargs)
	return decorated_function

@app.route('/admin')
@internal_only
def private_route():
	return "Success: This request came from the server itself."

@app.route('/gator')
def serve_gator():
	return send_from_directory(app.root_path, "gator.png")
	
@app.route('/smiley')
def serve_smiley():
	return send_from_directory(app.root_path, "smiley.jpg")

@app.route('/hack')
def serve_hack():
	if request.remote_addr in INTERNAL_IPS:
		return jsonify({"flag":"gator{st3p_as1d3_i_n33d_th1s}","error": f"oh shit, you are a hacker ...", "wtfH4x":True, "2spooky4me":True}), 451, {"X-hacker": "the best there ever was", "X-PoweredBy":"Hopes and Dreams TM"}
	else:
		return jsonify({"error": f"hahahaha if only it was that simple ...", "praise":True, "goodEffort":True}), 418

@app.route('/fetch', methods=['GET'])
def fetch_image():
	image_url = request.args.get('url') # this is the vulnerability, no validation, gets a page as server
	print(image_url)
	if not image_url:
		return jsonify({"error": "Missing url parameter"}), 400

	try:
		response = requests.get(image_url, timeout=5)
		return response.content, response.status_code, {
			'Content-Type': response.headers.get('Content-Type', 'image/png')
		}
	except Exception as e:
		return jsonify({"error": f"Failed to fetch image: {str(e)}"}), 500

@app.route('/')
def home():
	return jsonify({"error": f"Nothing here...", "running":"Python Flask"}), 500

if __name__ == '__main__':
	app.run(port=5000)
