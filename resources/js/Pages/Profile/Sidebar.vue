<template>
    <nav class="col-md-2 m-5 pl-5 d-none d-md-block sidebar float-left position-relative">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item p-2">
              <h5>Settings</h5>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="profile">
              Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ssh-keys">
              SSH Keys
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dns-providers">
              DNS Providers
            </a>
          </li>
        </ul>
      </div>
    </nav>
</template>

<style>
.nav-link {
    color: black;
}
</style>
