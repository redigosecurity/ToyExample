import random
import requests
from flask import Flask, request, jsonify
import urllib.parse

app = Flask(__name__)

@app.route('/add')
def addition():
    a = int(request.args.get('a'))
    b = int(request.args.get('b'))
    servers = ['http://localhost:5997', 'http://localhost:5998', 'http://localhost:5999']
    server = random.choice(servers)
    
    
    url = f"{server}/?" + urllib.parse.urlencode({'a' : a, 'b':b}) # not the best pattern, but works bc a and b can only be ints.
    response = requests.get(url)
    result = response.text
    return jsonify({'result': result})

if __name__ == '__main__':
    app.run(debug=True, port=5000)
