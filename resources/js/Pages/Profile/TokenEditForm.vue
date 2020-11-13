<template>
  <jet-form-section @submitted="updateProfileInformation">
    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <h1>Digital Ocean API Token</h1>
      </div>
      <!-- Name -->
      <div class="col-span-6 sm:col-span-6">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th style="width: 80%" scope="col">Token</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>dfgdf</td>
              <td>
                <button type="button" class="btn btn-primary">Edit</button>
              </td>
              <td>
                <button type="button" class="btn btn-secondary">x</button>
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
      form: this.$inertia.form(
        {
          _method: "PUT",
          name: this.user.name,
          email: this.user.email,
          photo: null,
        },
        {
          bag: "updateProfileInformation",
          resetOnSuccess: false,
        }
      ),

      photoPreview: null,
    };
  },

  methods: {
    updateProfileInformation() {
      if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0];
      }

      this.form.post(route("user-profile-information.update"), {
        preserveScroll: true,
      });
    },

    selectNewPhoto() {
      this.$refs.photo.click();
    },

    updatePhotoPreview() {
      const reader = new FileReader();

      reader.onload = (e) => {
        this.photoPreview = e.target.result;
      };

      reader.readAsDataURL(this.$refs.photo.files[0]);
    },

    deletePhoto() {
      this.$inertia
        .delete(route("current-user-photo.destroy"), {
          preserveScroll: true,
        })
        .then(() => {
          this.photoPreview = null;
        });
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
