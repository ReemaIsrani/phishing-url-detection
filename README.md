# phishing-url-detection
This system uses effective classification data mining algorithm to detect the e-banking phishing websites.

Website Link - https://check-url.000webhostapp.com

ML trained model with python API hosted on pythonanywhere.com

Data was taken from the following link
https://www.kaggle.com/akashkr/phishing-website-dataset

Following features are included -
Using the IP address: Feature 1: As an alternative, an IP address in the URL domain name can be used. Sometimes an IP address can be converted into radix 16 codes.
Rule: If IP address exists in the domain →phishing, otherwise → legitimate

URLlength: Feature 2: The average URL length has been calculated. If the number of URL characters is equal to 54 or greater than 54 then URL has been classified as phishing.
Rule: If the URL length < 54 → legitimate, URL length ≥ 54 and ≤ 75 → suspicious, otherwise → phishing

Using TinyURL: Feature 3:URL length can be shortened and even a web page can be opened in this way. Short URL domain name, which depends on behalf of the Long URL
domain, can be performed with HTTP Redirection.
Rule: IfTinyURL is containing in it → phishing, otherwise → legitimate

Using “@” symbol: Feature 4:It‟s been aforesaid that succeeding a part of"@" symbol in URL is ignored by the browser. It has been said that the next part of "@" symbol in URL is often the real address.
Rule: If URL is containing @ symbol → phishing, otherwise→ legitimate

Using “//” symbol: Feature 5:The user may be directed to another web site using “//”in URL.If URL starts with “HTTP” then “//” symbol must be in the 6th position. If URL
starts with “HTTPS” then “//” symbol must be in the 7th position.
Rule: The position of last occurrence of "//" in URL > 7 → phishing, otherwise→ legitimate.

Using “-” symbol: Feature 6:The dash symbol is rarely used in the legitimate URL.In this way users think that they are using a legitimate web page.
Rule: If (underscore)"-" symbol exists in domain name → phishing, otherwise → legitimate

Sub and multi sub domain: Feature 7:"www." and country code in the URL are ignored. The remaining points are counted in the URL. If Dots in Domain part is equal to1 then it is Legitimate and if the Dots in Domain part are 2 the it is Suspicious otherwise
phishing website.
Rule: number of dots in domain = 1 → legitimate, number of dots in domain = 2 → suspicious, otherwise → phishing

Domain registration length: Feature 8:It has been found that the fake domains which is longest have been used for one year only in the dataset.
Rule: domains expires on ≤ 1 year → phishing, otherwise→legitimate

Using HTTPS token: Feature 9: HTTPS token can be added to a part of domain of URL by attackers.
Rule: In domain part of URL using HTTPS token → phishing, otherwise → legitimate

Submitting information to e-mail: Feature 10: A web form is used to send a user's personal information to a server. “mail()” function can be used by using a server-side language and “mailto” can be used by using a client-side language.
Rule: using "mail ()" or "mailto:" → phishing, otherwise →Legitimate

Abnormal URL: Feature 11: This feature could be extracted from the WHOIS database. Identity is typically part of its URL for a legitimate website.
Rule: Host name is not in URL → phishing, otherwise →Legitimate

Iframe redirection: Feature 12: It has been said that to show an extra webpage the iframe tag is used.
Rule: using iframe → phishing, otherwise → legitimate

Age of domain: Feature 13: This feature could be extracted from the WHOIS database. It is observed that an age of legitimate domain is at least 6 months.
Rule: age of domain ≥ 6 months → legitimate, otherwise →phishing

Website traffic: Feature 14: This feature is measured interest in a website. Because of phishing websites live for a short period of time they may not be recognized by the Alexa
database. It was found that the legitimate websites are among the top in the ranking of 100. 000.If the domain has no traffic or it is not recognized by the Alexa database, then it has been classified as “phishing”. Otherwise it has been classified as “suspicious”. The values of Alexa Traffic Ranks are shown for http://www.ucla.edu/ website. The Traffic Ranking values were measured for Global and The United States in 2026 and 662 respectively
Rule: website rank < 100.000 → legitimate, website rank > 100.000 → suspicious, otherwise → phishing

Google Index: Feature 15: A site is displayed on search results when it is indexed by Google. Because of phishing webpages that can be accessed for a short period generally, many phishing webpages may not be found in the GoogleIndex.
Rule: webpage indexed by Google → legitimate, otherwise→ phishing


Model Training 
1- Phishing , 0- Legitimate in the output

Model
Train and test accuracy

Decision Tree Classifier
test: 0.8394080570019183
train: 0.8615987037537132

Random Forest Classifier
test: 0.8385859139490272
train: 0.8556575749392384

KNN classifier
test: 0.8095368594135379
train: 0.8320280853362139

Gradient Boosting classifier
test: 0.8470813921622362
train: 0.8649743451255738

Chosen model Gradient Boosting classifier

API hosting for trained model
API is hosted on pythonanywhere.com
API link - https://phishingurl.pythonanywhere.com/phishing 
Accepts POST requests JSON format URL as INPUT


