<template>
  <div>
    <form>
      <div class="col-span-6 sm:col-span-4">
        <h1>Add SSH Public Key</h1>
      </div>

      <div class="col-span-6 sm:col-span-4">
        <jet-label for="name" value="Name" />
        <jet-input
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="name"
        />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <jet-label value="Public Key" />
        <textarea v-model="sshKey" cols="60" rows="10"></textarea>
      </div>

    </form>
    <button type="button" class="btn btn-secondary" @click="submitForm">
      Add Key
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

  props: ["user"],

  data() {
    return {
      sshKey: [],
      name: [],
      sshData: [],
    };
  },

  methods: {
    submitForm() {
      this.sshData = [this.name, this.sshKey]
      console.log(this.sshData)
      axios
        .post("/addssh", this.sshKey)
        .then((response) => {
          console.log("new vote added");
        })
        .catch((error) => console.log("axios error", error));
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
