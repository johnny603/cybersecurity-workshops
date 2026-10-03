from flask import Flask, render_template, request, redirect, url_for,render_template_string

app = Flask(__name__)

@app.route("/", methods=["GET","POST"])
def home():
	if request.method == "POST":
		result = f"<h1>Preview</h1><br>{request.form.get('editor')}"
		rendered_result = render_template_string(result) # this is the vulnerability
		print(rendered_result)
		return render_template("base.html", title="Home Page", preview=rendered_result) #
		
	items_list = ["Python", "Flask", "Jinja2"]
	return render_template("base.html", title="Home Page")

if __name__ == "__main__":
	app.run(debug=True)
