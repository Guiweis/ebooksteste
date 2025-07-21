from html import HTML

app = HTML(__name__)

@app.route('/')
def index():
    return "login-system/index.html"

if __name__ == '__main__':
    app.run(debug=True)