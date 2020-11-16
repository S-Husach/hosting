<template>
  <div>
    <form>
      <div class="col-span-6 sm:col-span-5">
        <h1>Add Digital Ocean Account Token</h1>
      </div>
      <!-- Name -->
      <div class="col-span-6 sm:col-span-4">
        <jet-label value="Token" />
        <jet-input
          type="text"
          class="mt-1 mb-10 block w-full"
          v-model="token"
        />
      </div>
    </form>

    <button type="button" class="btn btn-secondary" @click="submitForm">
      Create
    </button>
  </div>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
  components: {
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
  },

  data() {
    return {
      token: '',
    };
  },

  methods: {
    submitForm() {
      var token = [this.token];
      console.log(this.token);
      axios
        .post("/add-token", token)
        .then((response) => {
          console.log('then', token);
        })
        .catch((error) => console.log("axios error", error));
        location.reload();
    },
  },
};
</script>

<style>
textarea {
  border: 1px;
  border: solid;
  border-color: rgb(189, 189, 189);
}
</style>
