To create the Node container (only required to do once):
- On production:
    - `sudo docker-compose up -d`
- On development:
    - `sudo docker-compose -f docker-compose.yml -f docker-compose-dev.yml up -d`

When you want to compile the assets:
- For production:
    - To deploy new code and compile it, use `fab deploy` from your development machine
- For development:
    - To build it once:
        - `docker exec open-state-theme-2019_node_1 yarn build`
    - Once built, you can also watch the files for changes and automatically compile them:
        - `docker exec open-state-theme-2019_node_1 yarn start`
            - browse to https://localhost:3000
