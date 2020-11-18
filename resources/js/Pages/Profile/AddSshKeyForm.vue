<template>
  <div>
    <form>
      <div class="shadow overflow-hidden sm:rounded-md">
        <div class="m-4 col-span-6 sm:col-span-4">
          <h1>Add SSH Public Key</h1>
        </div>
        <div class="px-4 py-5 bg-white sm:p-6">
          <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="name" value="Name" />
              <jet-input
                id="name"
                type="text"
                class="mt-1 block w-full"
                v-model="sshName"
              />
            </div>

            <div class="col-span-6 sm:col-span-4">
              <jet-label value="Public Key" />
              <textarea v-model="sshKey" cols="93" rows="10"></textarea>
            </div>
          </div>
          <button
            type="button"
            class="btn btn-success mt-3"
            @click="submitForm"
          >
            Add Key
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

  props: ["user"],

  data() {
    return {
      sshKey: "",
      sshName: "",
      sshData: [],
    };
  },

  methods: {
    submitForm() {
      var ssh = [this.sshName, this.sshKey];
      //console.log(ssh)
      axios
        .post("/addssh", ssh)
        .then((response) => {
          //console.log(ssh);
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
  border-radius: 10px;
}
</style>
