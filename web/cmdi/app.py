from flask import Flask, render_template, request, redirect, url_for,render_template_string,send_from_directory
import subprocess

app = Flask(__name__)
@app.route("/logo.svg")
def image():
	return send_from_directory(app.root_path, "logo.svg")
	
@app.route("/", methods=["GET","POST"])
def home():
	if request.method == "POST":
		cmd = request.form.get('commands') 
		app.logger.info(cmd)
		cmd_out = ""
		try:
			cmd_out = subprocess.run(cmd, shell=True, capture_output=True, text=True).stdout # No validation, this is the vulnerability
		except subprocess.CalledProcessError as e:
			cmd_out = "Command Failed. Try Again."
		"""result = f"<p>Console output: </p> <pre><code>{cmd_out}</code></pre>"
		rendered_result = render_template_string(result)
		print(rendered_result)"""
		return render_template("base.html", title="Home Page", output=cmd_out) #
		
	items_list = ["Python", "Flask", "Jinja2"]
	return render_template("base.html", title="Home Page")

if __name__ == "__main__":
	app.run(debug=True)
