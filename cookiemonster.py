import json
from selenium import webdriver
import sys

print("Available Cookies: ")
with open('data.json') as f:
    data = json.load(f)
    for number, ent in enumerate(data):
        if not ent["_source"]["layers"]:
            continue
        print number,":", ent["_source"]["layers"]["http.host"][0].encode("ascii","replace")
    id = input('Select the cookie to load: ')
    host = data[id]["_source"]["layers"]["http.host"][0].encode("ascii","replace")
    rawCookie = data[id]["_source"]["layers"]["http.cookie"][0].encode("ascii","replace")
    cookies = rawCookie.split("; ")
    driver = webdriver.Firefox()
    print("Getting Host: "+host)
    driver.get("http://"+host+"/")
    for cookie in cookies:
        array = cookie.split("=")
        driver.add_cookie({'name':array[0], 'value':array[1], 'path':'/'})
    print("Done, refresh the webpage")
