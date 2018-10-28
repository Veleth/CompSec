#!/bin/sh
sudo tshark -d tcp.port==8888:3,http -T json -e http.host -e http.cookie -l --no-duplicate-keys -a duration:$1 | tee data.json &
wait
python cookiemonster.py;
