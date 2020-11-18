<template>
  <div>
    <div class="shadow overflow-hidden sm:rounded-md">
      <div class="m-4 col-span-6 sm:col-span-4">
        <h1>Digital Ocean API Token</h1>
      </div>
      <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-6">
          <div class="col-span-6 sm:col-span-6">
            <div class="col-span-6 sm:col-span-6">
            <table class="table">
            <thead class="thead-light">
                <tr>
                <th style="width: 90%" scope="col">Token</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(token, index) in token" :key="index">
                <td>
                    <div v-if="!showEditToken">{{ token.access_key }}</div>
                    <div v-if="showEditToken">
                    <jet-input
                        type="text"
                        class="mt-1 block w-full"
                        v-model="newToken"
                    ></jet-input>
                    </div>
                </td>
                <td>
                    <button
                    type="button"
                    class="btn btn-primary"
                    @click="editToken(token.id)"
                    >
                    Edit
                    </button>
                </td>
                <td v-if="showEditToken">
                    <button
                    type="button"
                    class="btn btn-success"
                    @click="saveNewToken(token.id)"
                    >
                    Save
                    </button>
                </td>
                <td>
                    <button
                    type="button"
                    class="btn btn-secondary"
                    @click="softDelete(token.id)"
                    >
                    x
                    </button>
                </td>
                </tr>
            </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
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

  mounted() {
    this.getToken();
  },

  data() {
    return {
      showEditToken: false,
      token: '',
      newToken: '',
    };
  },

  methods: {
    getToken() {
      axios
        .get("/token")
        .then((response) => {
          const token = response.data;
          this.token = token;
          this.newToken = token[0].access_key;
        //   console.log("token from edit", token);
        })
        .catch((error) => console.log(error));
    },

    softDelete(index) {
      axios
        .get("/token-delete" + index)
        .then((response) => {
        //   console.log(index);
        })
        .catch((error) => console.log(error));
      location.reload();
    },

    editToken() {
      this.showEditToken = !this.showEditToken;
    //   var newToken = [this.token[0].access_key];
    //   console.log(newToken);
    },

    saveNewToken(index) {
      var newToken = [this.newToken];
      console.log(newToken);
      axios
        .post("/token-new" + index, newToken)
        .then((response) => {
          console.log(newToken);
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
