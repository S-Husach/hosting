<template>
  <div>
    <form>
      <div class="shadow overflow-hidden sm:rounded-md">
        <div class="m-4 col-span-6 sm:col-span-4">
          <h1>Add Digital Ocean Account Token</h1>
        </div>
        <div class="px-4 py-5 bg-white sm:p-6">
          <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-4">
              <jet-label value="Token" />
              <jet-input
                type="text"
                class="mt-1 mb-10 block w-full"
                v-model="token"
              />
            </div>
          </div>
          <button type="button" class="btn btn-primary" @click="submitForm">
            Create
          </button>
        </div>
      </div>
    </form>
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
      token: "",
    };
  },

  methods: {
    submitForm() {
      var token = [this.token];
      console.log(this.token);
      axios
        .post("/add-token", token)
        .then((response) => {
          console.log("then", token);
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
