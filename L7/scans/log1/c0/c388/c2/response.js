var res = {'data':'HTTP/1.1 200 Partial Content\x0aDate: Sun, 02 Dec 2018 16:06:14 GMT\x0aServer: Apache/2.4.18 (Unix) OpenSSL/1.0.2g PHP/5.6.20 mod_perl/2.0.8-dev Perl/v5.16.3\x0aLast-Modified: Sun, 02 Dec 2018 15:17:10 GMT\x0aETag: \x22358-57c0b86b64169\x22\x0aAccept-Ranges: bytes\x0aContent-Length: 856\x0aContent-Range: bytes 0-855/856\x0aKeep-Alive: timeout=5, max=57\x0aConnection: Keep-Alive\x0aContent-Type: text/html\x0a\x0a\x3c!DOCTYPE html\x3e\x0a\x3chtml\x3e\x0a  \x3cbody\x3e\x0a    \x3ch2\x3eWelcome, %name%\x3c/h2\x3e\x0a\x0a    \x3ch3\x3eYour account number: %accno%\x3c/h3\x3e\x0a    \x3ch3\x3eYour money: $%money%\x3c/h3\x3e \x0a\x0a    \x3ch3\x3eMake a transaction:\x3c/h3\x3e\x0a    \x3cform id=\x27transaction-form\x27 action=\x22confirm.php\x22 method=\x27post\x27\x3e\x0a      \x3cinput type=\x22hidden\x22 name=\x22from\x22 value=\x22%accno%\x22 required/\x3e\x0a      \x3cinput type=\x22hidden\x22 name=\x22balance\x22 value=\x22%money%\x22 required/\x3e\x0a      \x3cinput type=\x22text\x22 name=\x22to\x22 placeholder=\x22Reciever account name\x22 required/\x3e\x0a      \x3cinput type=\x22text\x22 name=\x22amount\x22 placeholder=\x22amount\x22 required/\x3e\x0a      \x3cbutton type=\x27submit\x27\x3eSend\x3c/button\x3e\x0a    \x3c/form\x3e\x0a\x0a    \x3cbutton id=\x22myButton\x22\x3eLog out\x3c/button\x3e\x0a\x0a    \x3ch3\x3eConfirmed transactions:\x3c/h3\x3e\x0a    %tr%\x0a\x0a    \x3cscript type=\x22text/javascript\x22\x3e\x0a      document.getElementById(\x22myButton\x22).onclick = function () {\x0a          location.href = \x22index.php\x22;\x0a      };\x0a    \x3c/script\x3e\x0a  \x3c/body\x3e\x0a\x3c/html\x3e'}