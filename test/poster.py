import urllib
import urllib2

#query_args = {'q':'query string', 'foo':'bar'}
#encoded_args = urllib.urlencode(query_args)
parameters = {'devicename':'my raspberry pi', 'devicedescription':'sn number'};

encoded_args = urllib.urlencode(parameters);
url = 'http://localhost/mybackground/index.php/RemoteIPRegister/Index/registerIP'
#url = 'http://www.neuseeker.com/getip.php'
print urllib2.urlopen(url, encoded_args).read()