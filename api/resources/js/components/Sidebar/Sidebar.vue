<template>
  <nav
    :class="{sidebar: true, sidebarStatic, sidebarOpened}"
    @mouseenter="sidebarMouseEnter"
    @mouseleave="sidebarMouseLeave"
  >
    <header class="logo">
      <router-link to="/app"><span class="text-warning">Sing</span> App</router-link>
    </header>
    <ul class="nav">
      <NavLink
        :activeItem="activeItem"
        header="Dashboard"
        link="/app/dashboard"
        iconName="flaticon-home"
        index="dashboard"
        isHeader
      />
      <h5 class="navTitle">TEMPLATE</h5>
      <NavLink
        :activeItem="activeItem"
        header="Typography"
        link="/app/typography"
        iconName="flaticon-controls"
        index="typography"
        isHeader
      />
      <NavLink
        :activeItem="activeItem"
        header="Tables"
        link="/app/tables"
          iconName="flaticon-equal-1"
        index="tables"
        isHeader
      />
      <NavLink
        :activeItem="activeItem"
        header="Notifications"
        link="/app/notifications"
        iconName="flaticon-alarm"
        index="notifications"
        isHeader
      />
      <NavLink
        :activeItem="activeItem"
        header="UI Elements"
        link="/app/ui"
        iconName="flaticon-layers"
        index="ui"
        :childrenLinks="[
          { header: 'Icons', link: '/app/ui/icons' },
          { header: 'Charts', link: '/app/ui/charts' },
          { header: 'Google Maps', link: '/app/ui/maps' },
        ]"
      />

    </ul>
    <p>
    <h5 class="navTitle">
      LABELS
      <a class="actionLink">
        <i class="la la-plus float-right" />
      </a>
    </h5>
    <ul class="sidebarLabels">
      <li>
        <a href="#">
          <i class="fa fa-circle text-warning mr-2" />
          <span class="labelName">My Recent</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-circle text-gray mr-2" />
          <span class="labelName">Starred</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-circle text-danger mr-2" />
          <span class="labelName">Background</span>
        </a>
      </li>
    </ul>
    <h5 class="navTitle">
      PROJECTS
    </h5>
    <div class="sidebarAlerts">
      <b-alert
        v-for="alert in alerts"
        :key="alert.id"
        class="sidebarAlert" variant="transparent"
        show dismissible
      >
        <span>{{alert.title}}</span><br />
        <b-progress class="sidebarProgress progress-xs mt-1"
          :variant="alert.color" :value="alert.value" :max="100" />
        <small>{{alert.footer}}</small>
      </b-alert>
    </div>
  </nav>
</template>

<script>
import { mapState, mapActions } from 'vuex';
import isScreen from '../../core/screenHelper';
import NavLink from './NavLink/NavLink';

export default {
  name: 'Sidebar',
  components: { NavLink },
  data() {
    return {
      alerts: [
        {
          id: 0,
          title: 'Sales Report',
          value: 15,
          footer: 'Calculating x-axis bias... 65%',
          color: 'info',
        },
        {
          id: 1,
          title: 'Personal Responsibility',
          value: 20,
          footer: 'Provide required notes',
          color: 'danger',
        },
      ],
    };
  },
  methods: {
    ...mapActions('layout', ['changeSidebarActive', 'switchSidebar']),
    setActiveByRoute() {
      const paths = this.$route.fullPath.split('/');
      paths.pop();
      this.changeSidebarActive(paths.join('/'));
    },
    sidebarMouseEnter() {
      if (!this.sidebarStatic && (isScreen('lg') || isScreen('xl'))) {
        this.switchSidebar(false);
        this.setActiveByRoute();
      }
    },
    sidebarMouseLeave() {
      if (!this.sidebarStatic && (isScreen('lg') || isScreen('xl'))) {
        this.switchSidebar(true);
        this.changeSidebarActive(null);
      }
    },
  },
  created() {
    this.setActiveByRoute();
  },
  computed: {
    ...mapState('layout', {
      sidebarStatic: state => state.sidebarStatic,
      sidebarOpened: state => !state.sidebarClose,
      activeItem: state => state.sidebarActiveElement,
    }),
  },
};
</script>

<!-- Sidebar styles should be scoped -->
<style src="./Sidebar.scss" lang="scss" scoped/>
