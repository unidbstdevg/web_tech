docker build . -t my_lamp
docker run --name uni_wt_serv -p "80:80" -v ${PWD}/app:/app my_lamp
