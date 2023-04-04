# To create the Node container (only required to do once):
- On production:
    - `sudo docker-compose up -d`
    - (afterwards when you need to start the container if it exited you can simply us `sudo docker compose start`)
- On development:
    - `sudo docker-compose -f docker-compose.yml -f docker-compose-dev.yml up -d`
    - (afterwards when you need to start the container if it exited you can simply us `sudo docker-compose -f docker-compose.yml -f docker-compose-dev.yml start`)
    - `docker exec open-state-theme-2019_node_1 yarn`
    - Enter the container `sudo docker exec -it open-state-theme-2019_node_1 bash` and link the Nginx load balancer IP to openstate.eu in the hosts file (NOTE: you need to do this again after each time you start the container)
        `echo "x.x.x.x openstate.eu" >> /etc/hosts`

# When you want to compile the assets:
- For production:
    - To deploy new code and compile it, use `fab deploy` from your development machine
- For development:
    - To build it once:
        - `docker exec open-state-theme-2019_node_1 yarn build`
    - Once built, you can also watch the files for changes and automatically compile them and inject them into your browser using Browsersync (this will thus not generate `main.css` in the `dist` directory as this file is directly injected in your browser):
        - `docker exec open-state-theme-2019_node_1 yarn start`
            - browse to https://localhost:3000
            - NOTE: if you run `yarn start` a second time it will run on port 3002 (which isn't opened in the container); restart the container to get it to work on port 3000 again
                - After restarting the container make sure to add `echo "x.x.x.x openstate.eu" >> /etc/hosts` again as shown above

Some other commands:
- To only check lint style use `docker exec open-state-theme-2019_node_1 yarn run lint:styles`


# To access wp-admin while developing (this requires the Nginx load balancer):
- add the following to `/etc/hosts` on your host, where `x.x.x.x` is the IP of the Nginx load balancer:
    ```
    x.x.x.x mu.openstate.eu
    x.x.x.x openstate.eu
    x.x.x.x www.openstate.eu
    ```
