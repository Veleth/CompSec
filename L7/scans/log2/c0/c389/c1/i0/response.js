var res = {'data':'HTTP/1.1 200 Partial Content\x0aDate: Sun, 02 Dec 2018 16:17:52 GMT\x0aServer: Apache/2.4.18 (Unix) OpenSSL/1.0.2g PHP/5.6.20 mod_perl/2.0.8-dev Perl/v5.16.3\x0aLast-Modified: Sun, 02 Dec 2018 15:17:10 GMT\x0aETag: \x2214f-57c0b86b660a9\x22\x0aAccept-Ranges: bytes\x0aContent-Length: 335\x0aContent-Range: bytes 0-334/335\x0aKeep-Alive: timeout=5, max=48\x0aConnection: Keep-Alive\x0aContent-Type: text/html\x0a\x0a\x3c!DOCTYPE html\x3e\x0a\x3chtml\x3e\x0a  \x3cbody\x3e\x0a    \x3ch2\x3eWelcome, Admin\x3c/h2\x3e\x0a\x0a    \x3cbutton id=\x22myButton\x22\x3eLog out\x3c/button\x3e\x0a\x0a    \x3ch3\x3eUnconfirmed transactions:\x3c/h3\x3e\x0a    %tr%\x0a\x0a    \x3cscript type=\x22text/javascript\x22\x3e\x0a      document.getElementById(\x22myButton\x22).onclick = function () {\x0a          location.href = \x22index.php\x22;\x0a      };\x0a    \x3c/script\x3e\x0a  \x3c/body\x3e\x0a\x3c/html\x3e'}