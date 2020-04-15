from flask import Flask, render_template
from controllers.index import Index
# from index import Index

app = Flask(__name__, static_url_path='')
 
 
@app.route('/')
@app.route('/index')
def hello():
    idx = Index();
    return render_template('index.html', resultData = idx.hello())
 
if __name__ == '__main__':
    #app.run(debug=True, host='0.0.0.0')
    app.run(host='0.0.0.0')
    #app.run(port=80)
