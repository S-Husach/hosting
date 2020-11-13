<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        SSH Keys
      </h2>
    </template>
    <div>
      <sidebar />
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <add-ssh-key-form/>
      </div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <ssh-keys-list/>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Sidebar from "./Sidebar";
import AddSshKeyForm from "./AddSshKeyForm";
import SshKeysList from "./SshKeysList";

export default {
  props: ["sessions"],

  components: {
    Sidebar,
    AppLayout,
    AddSshKeyForm,
    SshKeysList,
  },
};
</script>
