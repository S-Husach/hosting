<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">DNS Providers</h2>
    </template>
    <div>
      <sidebar/>
      <div v-if="!token.length" class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <add-token-form/>
      </div>
      <div v-if="token.length" :token="token" class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <token-edit-form/>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Sidebar from "./Sidebar";
import DeleteUserForm from "./DeleteUserForm";
import JetSectionBorder from "@/Jetstream/SectionBorder";
import LogoutOtherBrowserSessionsForm from "./LogoutOtherBrowserSessionsForm";
import TwoFactorAuthenticationForm from "./TwoFactorAuthenticationForm";
import UpdatePasswordForm from "./UpdatePasswordForm";
import UpdateProfileInformationForm from "./UpdateProfileInformationForm";
import AddTokenForm from './AddTokenForm';
import TokenEditForm from './TokenEditForm';

export default {
  components: {
    Sidebar,
    AppLayout,
    DeleteUserForm,
    JetSectionBorder,
    LogoutOtherBrowserSessionsForm,
    TwoFactorAuthenticationForm,
    UpdatePasswordForm,
    UpdateProfileInformationForm,
    AddTokenForm,
    TokenEditForm,
  },

  mounted() {
    this.getToken();
  },

data() {
    return {
      token: '',
    };
  },

  methods: {
    getToken() {
      axios
        .get("/token")
        .then((response) => {
          const token = response.data;
          this.token = token;
          console.log('token', token);
        })
        .catch((error) => console.log(error));
    },
  }
};
</script>
