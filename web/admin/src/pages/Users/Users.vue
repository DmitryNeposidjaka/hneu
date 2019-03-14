<template>
  <div class="tables-basic">
    <b-breadcrumb>
      <b-breadcrumb-item>YOU ARE HERE</b-breadcrumb-item>
      <b-breadcrumb-item active>Tables Basic</b-breadcrumb-item>
    </b-breadcrumb>
    <h2 class="page-title">Tables - <span class="fw-semi-bold">Static</span></h2>
    <b-row>
      <b-col>
        <Widget
                title="<h5>Table <span class='fw-semi-bold'>Styles</span></h5>"
                customHeader settings close
        >
          <div class="table-resposive">
            <b-table striped hover :items="data" />
          </div>
        </Widget>
      </b-col>
    </b-row>
  </div>
</template>

<script>
    import $ from 'jquery';
    import Vue from 'vue';
    import Widget from '@/components/Widget/Widget';
    import 'imports-loader?jQuery=jquery,this=>window!jquery-sparkline'; // eslint-disable-line

    export default {
        name: 'Users',
        components: { Widget },
        data() {
            return {
                data: [],
            };
        },
        methods: {
            parseDate(date) {
                const dateSet = date.toDateString().split(' ');
                return `${date.toLocaleString('en-us', { month: 'long' })} ${dateSet[2]}, ${dateSet[3]}`;
            },
            checkAll(ev, checkbox) {
                const checkboxArr = (new Array(this[checkbox].length)).fill(ev.target.checked);
                Vue.set(this, checkbox, checkboxArr);
            },
            changeCheck(ev, checkbox, id) {
                this[checkbox][id] = ev.target.checked;
                if (!ev.target.checked) {
                    this[checkbox][0] = false;
                }
            },
            getRandomData() {
                const result = [];

                for (let i = 0; i <= 8; i += 1) {
                    result.push(Math.floor(Math.random() * 20) + 1);
                }

                return result;
            },
            initCharts() {
                const colors = ['#547fff', '#9964e3', '#f55d5d', '#ffc247', '#3abf94'];

                $.each($('.sparkline-chart'), (id, chart) => {
                    $(chart).sparkline(this.getRandomData(), {
                        type: 'bar',
                        barColor: colors[Math.floor(Math.random() * colors.length)],
                    });
                });
            },

            getData() {
                let vm = this;
                this.axios.get('/user/all')
                    .then(function (response) {
                        vm.data = response.data
                    })
            }
        },
        mounted() {
            this.initCharts();
            this.getData();
        },
    };
</script>

<style src="./Users.scss" lang="scss" scoped />
