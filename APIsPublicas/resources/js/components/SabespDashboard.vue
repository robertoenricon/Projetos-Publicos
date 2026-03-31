<template>
    <div class="card shadow-lg">
        <div class="card-header dashboard-header p-4 border-0">
            <div class="row align-items-center">
                <div class="col-md-5 col-lg-4">
                    <label for="dateInput" class="form-label text-white fw-semibold mb-1">
                        <i class="bi bi-calendar3 me-1"></i> Data de Referência
                    </label>
                    <div class="input-group">
                        <input type="date" id="dateInput" class="form-control form-control-lg border-0 shadow-sm" v-model="selectedDate">
                        <button class="btn btn-light btn-lg text-primary fw-bold shadow-sm px-4" @click="fetchDailySummary" :disabled="loading">
                            <i class="bi bi-search me-1"></i> Buscar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-secondary">
                        <tr>
                            <th class="ps-4 text-uppercase fs-7">Sistema</th>
                            <th class="text-uppercase fs-7">Volume (%)</th>
                            <th class="text-uppercase fs-7">Pluviometria Dia</th>
                            <th class="text-uppercase fs-7">Pluv. Acumulada/Mês</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="loading">
                            <td colspan="4" class="text-center py-5">
                                <div class="spinner-grow text-success mb-3" role="status"></div>
                                <h6 class="text-muted">Buscando informações na Sabesp...</h6>
                            </td>
                        </tr>

                        <tr v-else-if="error">
                            <td colspan="4" class="text-center py-4 text-danger fw-bold">
                                <i class="bi bi-x-circle me-1"></i> {{ error }}
                            </td>
                        </tr>

                        <tr v-else-if="systems.length === 0">
                            <td colspan="4" class="text-center py-4 text-warning fw-bold">
                                <i class="bi bi-exclamation-triangle me-1"></i> Nenhum dado encontrado para esta data.
                            </td>
                        </tr>

                        <tr v-else v-for="system in systems" :key="system.Nome">
                            <td class="ps-4 fw-semibold text-dark">
                                <i class="bi bi-droplet-half text-primary me-2"></i> {{ system.Nome.replace(/sistema/gi, '').trim() || '-' }}
                            </td>
                            <td>
                                <span class="badge rounded-pill volume-badge shadow-sm" :class="getVolumeBadgeClass(system.VolumePorcentagem)">
                                    {{ system.VolumePorcentagem || '0' }}%
                                </span>
                            </td>
                            <td class="text-muted">
                                <i class="bi bi-cloud-drizzle me-1"></i> {{ system.PluviometriaDia || '-' }} mm
                            </td>
                            <td class="text-muted">
                                <i class="bi bi-cloud-rain me-1"></i> {{ system.PluviometriaAcumuladaMes || '-' }} mm
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

// Recebe as variáveis dinâmicas do Blade
const props = defineProps({
    initialDate: String,
    apiUrl: String
});

const selectedDate = ref(props.initialDate);
const systems = ref([]);
const loading = ref(false);
const error = ref(null);

const getVolumeBadgeClass = (volume) => {
    if (!volume) return 'bg-secondary';
    const volNum = parseFloat(String(volume).replace(',', '.')); 
    if (isNaN(volNum)) return 'bg-secondary';
    if (volNum < 30) return 'bg-danger';
    if (volNum < 60) return 'bg-warning text-dark';
    return 'bg-success';
};

const fetchDailySummary = async () => {
    if (!selectedDate.value) return;

    loading.value = true;
    error.value = false;
    systems.value = [];

    try {
        const finalUrl = `${props.apiUrl}/${selectedDate.value}`; //Url já vem do Blade com o formato correto, só falta adicionar a data

        const response = await fetch(finalUrl, {
            headers: {
                'Accept': 'application/json'
            }
        });
        
        const data = await response.json();
        if (!response.ok) {
            error.value = data.message || 'Erro inesperado';
            return;
        }
        systems.value = data.sistemas || [];

    } catch (err) {
        error.value = "Erro ao buscar dados. " + (err.message || 'Tente novamente mais tarde.');
    } finally {
        loading.value = false;
    }
};

onMounted(() => {
    fetchDailySummary();
});
</script>

<style scoped>
.dashboard-header {
    background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
    border-radius: 1rem 1rem 0 0;
}
.table > :not(caption) > * > * {
    padding: 1rem 0.75rem;
}
.volume-badge {
    font-size: 0.9rem;
    padding: 0.4em 0.8em;
}
</style>