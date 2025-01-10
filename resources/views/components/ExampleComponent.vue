
<template>
  <div class="example-component">
    <h2 class="text-center text-lg font-bold">Hello from Vue!</h2>
    <p class="text-center mt-4">
      This is a simple Vue.js component integrated into your Laravel app.
    </p>
    <div class="button-container mt-6">
      <button @click="handleClick" class="btn">
        Click Me
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "ExampleComponent",
  methods: {
    handleClick() {
      alert("You clicked the button!");
    },
  },
};
</script>

<style scoped>
.example-component {
  background: #f3f4f6;
  padding: 20px;
  border-radius: 10px;
  max-width: 400px;
  margin: 0 auto;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}
.text-center {
  text-align: center;
}
.btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #4f46e5;
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s, transform 0.3s;
}
.btn:hover {
  background-color: #3b82f6;
  transform: scale(1.05);
}
</style>