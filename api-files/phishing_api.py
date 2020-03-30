from flask import Flask, request, jsonify
import traceback
import pandas as pd
from sklearn.externals import joblib 
import rule_engine
import requests
import urllib.request as urllib2
app = Flask(__name__)
@app.route('/phishing', methods=['POST','GET'])
def phishing():
    try:
        if request.method == 'POST':
            data=request.get_json(force=True)
            ip=data['url']
            
            #exists check
            try:
                urllib2.urlopen(ip)
            except:
                return jsonify({'prediction':'Provided Website URL does not exist'})
            
            #extracting features
            having_IP=rule_engine.having_IP(ip)
            url_length=rule_engine.url_length(ip)
            shortened=rule_engine.shortened(ip)
            contains_at=rule_engine.contains_at(ip)
            last_slash=rule_engine.last_slash(ip)
            contains_dash=rule_engine.contains_dash(ip)
            dots=rule_engine.dots(ip)
            domain_period=rule_engine.domain_period(ip)
            https_token=rule_engine.https_token(ip)
            mailto=rule_engine.mailto(ip)
            redirect=rule_engine.redirect(ip)
            iframe=rule_engine.iframe(ip)
            domain_age=rule_engine.domain_age(ip)
            alexa_rank=rule_engine.alexa_rank(ip)
            
            row=[having_IP,url_length,shortened,contains_at,last_slash,contains_dash,dots,domain_period,https_token,mailto,redirect,iframe,domain_age,alexa_rank]
            print(row)
            features=pd.DataFrame([row])

            model = joblib.load('gbc.pkl')
            output=model.predict(features)
            if(output[0]==0):
                pred='Legitimate'
            elif(output[0]==1):
                pred='Phishing'
            return jsonify({'prediction':pred})
    except:
        return jsonify({'trace': traceback.format_exc()})


if __name__ == '__main__':
    try:
        port = int(sys.argv[1])
    except:
        port = 5000
    app.run(port=port, debug=True)
