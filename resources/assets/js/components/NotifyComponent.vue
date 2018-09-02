<template>

        <div view="dropdown" class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                <span class="fa fa-bell-o">(orders.length)</span>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu notify" style="width:300px">
                <li>
                    <div>
                        <a href="">
                           {{ orders.data['product_name'] }}
                        </a>
                    </div>
                </li>
            </ul>
        </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props:['orders'],
    }
</script>
