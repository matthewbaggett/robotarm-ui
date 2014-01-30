sudo killall -9 ffmpeg;
sudo ffmpeg -v verbose -r 5 -s 640x480 -f video4linux2 -i /dev/video0 http://milan:9999/dozer.ffm
