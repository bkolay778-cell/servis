#!/bin/bash

# Build the React app
yarn build

# Serve the built files using serve
npx serve -s build -l ${PORT:-3000}
