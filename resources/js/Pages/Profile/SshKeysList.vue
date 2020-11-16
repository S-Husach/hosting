<template>
  <jet-form-section>
    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <h1>SSH Keys</h1>
      </div>
      <!-- Name -->
      <div class="col-span-6 sm:col-span-6">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th style="width: 90%" scope="col">Name</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(key, index) in keys" :key="index">
              <td>{{ key.name }}</td>
              <td>
                <button type="button" class="btn btn-secondary" @click="softDelete(key.id)">x</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </template>
  </jet-form-section>
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
      keys: [],
    };
  },

  mounted() {
    this.getKeys();
  },

  methods: {
    getKeys() {
      axios
        .get("/keys")
        .then((response) => {
          const keys = response.data;
          this.keys = keys;
          console.log('keys', keys);
        })
        .catch((error) => console.log(error));
    },

    softDelete(index) {
      axios
          .get('/delete' + index)
          .then((response) => {
              console.log(index)
          })
          .catch((error) => console.log(error));
          location.reload();
    }
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
