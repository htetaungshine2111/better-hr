<template>
    <div>
        <h3>Authors</h3>
        <ul>
            <li v-for="item in employee" :key="item.id">
                <nuxt-link :to="`/article/${item.id}`">
                    {{ item.name }}
                </nuxt-link>
            </li>
        </ul>
    </div>
</template>

<script>
    import employee from '~/apollo/queries/fetchEmployee'
    export default {
        apollo: {
            employee: {
                prefetch: true,
                query: employee
            }
        },
        head: {
            title: 'Authors of Blog'
        }
    }
</script>