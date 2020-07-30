<template>
<div class="main">
<Header/>
<Sidebar/>
<NonAccordanceReport/>
<NonAccordanceReportList/>
</div>
</template>

<script>

import Header from './Header.vue';
import Sidebar from './Sidebar.vue';
import NonAccordanceReport from './NonAccordanceReport.vue';
import NonAccordanceReportList from './NonAccordanceReportList.vue';
    export default {
        name: 'home',
        components: {Header,
                     Sidebar,
                     NonAccordanceReport,
                     NonAccordanceReportList,
                    }
                   }
</script>
