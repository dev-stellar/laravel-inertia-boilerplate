<template>
    <label class="block">
        <span class="text-gray-700"
              v-if="label"
              v-text="label"
        ></span>
        <input class="form-input border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
               :type="type"
               :value="value"
               :name="name"
               @input="$emit('input', $event.target.value)"
               :placeholder="placeholder"
               :required="required"
        >
    </label>
</template>

<script>
    export default {
        name: "BaseInput",
        props: {
            value: null,
            name: String,
            label: String,
            placeholder: String,
            required: String,
            type: {
                type: String,
                default: 'text',
            }
        }
    }
</script>

<style scoped>

</style>
