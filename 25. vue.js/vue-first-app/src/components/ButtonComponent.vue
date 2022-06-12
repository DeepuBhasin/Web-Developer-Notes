<template>
  <div>
      <button :data-id="test===true ? '124':null">
          <slot>
              
          </slot>
      </button>
  </div>
</template>

<script>
export default {
    name : 'ButtonComponent',
    data(){
        return {
            test : true
        }
    }
}
</script>

<style>

</style>