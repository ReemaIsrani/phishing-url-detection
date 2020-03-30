from urllib.parse import urlparse
import socket
import urlunshort
import whois
import requests
from bs4 import BeautifulSoup
import urllib.request as urllib2
from datetime import datetime
from urllib.parse import urlencode
import sys, bs4

#1
def having_IP(ip):
    try:
        domain = urlparse(ip).netloc
        if socket.gethostbyname(domain) == domain:
            return -1
        else:
            return 1
    except:
        return -1
#2
def url_length(ip):
    try:
        l=len(ip)
        if(l<54):
            return 1
        elif(l>=54 and l<=75):
            return 0
        else:
            return -1
    except:
        return -1
#3
def shortened(ip):
    try:
        if(urlunshort.is_shortened(ip)):
            return -1
        else:
            return 1
    except:
        return -1
#4
def contains_at(ip):
    if('@' in ip):
       return -1
    else:
       return 1
    
#5
def last_slash(ip):
    if(ip.rfind('/') > 6):
       return -1
    else:
        return 1
#6
def contains_dash(ip):
    if('-' in ip):
        return -1
    else:
        return 1
#7
def dots(ip):
    try:
        str1=ip.replace('www.','',1)
        c=str1.count('.')
        if(c==2):
            return 1
        elif(c==3):
            return 0
        else:
            return -1
    except:
        return -1
'''
#8
def cerificate(ip):
    print('incomplete')
'''
#9
def domain_period(ip):
    try:
        domain = urlparse(ip).netloc
        domain_info=whois.whois(domain)
        expiry=domain_info.expiration_date
        creation=domain_info.creation_date
        if((expiry-creation).days <= 366):
            return -1
        else:
            return 1
    except:
        return -1
'''
#10
def favicon(ip):
    print('incomplete')
#11
def port(ip):
    print('incomplete')
'''
#12
def https_token(ip):
    try:
        domain = urlparse(ip).netloc
        if('https' in domain):
           return -1
        else:
           return 1
    except:
        return -1
'''
#13
def request_url(ip):
    print('incomplete')
#14
def url_of_anchor(ip):
    print('incomplete')
#15
def links_in_tags(ip):
    print('incomplete')
#16
def SFH(ip):
    print('incomplete')
'''
#17
def mailto(ip):
    try:
        soup = BeautifulSoup(urllib2.urlopen(ip).read(),features='html.parser')
        try:
            for link in soup.find_all('a'):
                l=link.get('href')
                if('mailto:' in l):
                    return -1
                else:
                    return 1
        except:
            return 1
    except:
        return -1
'''
#18
def whois_host(ip):
    print('incomplete')
'''
#19
def redirect(ip):
    try:
        response=requests.get(ip)
        n=len(response.history)
        if(n<=1):
            return 1
        elif(n>=2 and n<4):
            return 0
        else:
            return -1
    except:
        return -1
'''
#20
def onmouseover(ip):
    print('incomplete')
#21
def right_click(ip):
    print('incomplete')
#22
def popup(ip):
    print('incomplete')
'''
#23
def iframe(ip):
    try:
        soup = BeautifulSoup(urllib2.urlopen(ip).read(),features='html.parser')
        frames=soup.find_all('iframe')
        print(frames)
        if(len(frames)>0):
            return -1
        else:
            return 1
    except:
        return -1
#24
def domain_age(ip):
    try:
        domain=whois.whois(urlparse(ip).netloc)
        creation=domain.creation_date
        today = datetime.now()
        if((today-creation).days < 183):
            return -1
        else:
            return 1
    except:
        return -1
'''
#25
def dns_record(ip):
    print('incomplete')
'''
#26
def alexa_rank(ip):
    try:
        rank=bs4.BeautifulSoup(urllib2.urlopen("http://data.alexa.com/data?cli=10&dat=s&url="+ ip).read(),features='xml').find("REACH")['RANK']
        if(int(rank) < 100000):
            return 1
        elif(int(rank) > 100000):
            return 0
    except Exception as e:
        print(e)
        return -1
'''
#27
def pagerank(ip):
    print('incomplete')
#28

def google_index(url):
    query = {'q': 'site:' + url}
    google = "https://www.google.com/search?" + urlencode(query)
    print(google)
    user_agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36'
    headers = {'User-Agent': user_agent}
    data = requests.get(google, headers=headers)
    data.encoding = 'ISO-8859-1'
    soup = BeautifulSoup(str(data.content), "html.parser")
    try:
        check = soup.find(id="rso").find("div").find("div").find("h3").find("a")["href"]
        print(check)
        return 1
    except AttributeError:
        return -1

#29
#30
'''
if __name__=='__main__':
    print(domain_period('https://stackoverflow.com'))

    
