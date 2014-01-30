sudo killall -9 ffmpeg;
sudo ffmpeg -v verbose -r 5 -s 320x160 -f video4linux2 -i /dev/video0 http://milan:9999/dozer.ffm
