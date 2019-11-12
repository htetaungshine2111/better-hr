const laravelNuxt = require("laravel-nuxt");

module.exports = laravelNuxt({
    // Your Nuxt options here...
    modules: [
        '@nuxtjs/apollo',
    ],
    apollo: {
        clientConfigs: {
            default: {
                httpEndpoint: 'http://localhost:8002/graphql'
            }
        }
    },
    plugins: [],

    // Options such as mode, srcDir and generate.dir are already handled for you.
});