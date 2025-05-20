import { useEffect, useState } from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import axios from 'axios';

export default function Sala1({ auth }) {
    const [alunos, setAlunos] = useState([]);
    const [presencas, setPresencas] = useState({});
    const [dataSelecionada, setDataSelecionada] = useState(new Date().toISOString().slice(0, 10)); // YYYY-MM-DD

    // Carrega os alunos ao entrar na página
    useEffect(() => {
        axios.get('/alunos').then((response) => {
            setAlunos(response.data);

            // Inicializa todos como presentes
            const inicial = {};
            response.data.forEach(aluno => {
                inicial[aluno.id] = true;
            });
            setPresencas(inicial);
        });
    }, []);

    const handleCheckboxChange = (alunoId) => {
        setPresencas(prev => ({
            ...prev,
            [alunoId]: !prev[alunoId],
        }));
    };

    const handleSubmit = () => {
        const payload = Object.entries(presencas).map(([aluno_id, presente]) => ({
            aluno_id: Number(aluno_id),
            presente,
        }));

        axios.post('/presencas', { presencas: payload, data: dataSelecionada })
            .then(() => alert('Presenças salvas com sucesso!'))
            .catch(() => alert('Erro ao salvar presença.'));
    };

    const handleExportarPdf = () => {
        axios.get('/presencas/pdf', { 
            params: { data: dataSelecionada }, 
            responseType: 'blob' 
        })
        .then((response) => {
            const url = window.URL.createObjectURL(new Blob([response.data]));
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', `presencas_${dataSelecionada}.pdf`);
            document.body.appendChild(link);
            link.click();
            link.remove();
            window.URL.revokeObjectURL(url);
        })
        .catch(() => alert('Erro ao gerar o PDF'));
    };

    return (
        <AuthenticatedLayout
            auth={auth}
            header={<h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Sala 1</h2>}
        >
            <Head title="Sala 1" />

            <div className="py-12">
                <div className="max-w-4xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 className="text-lg font-bold mb-4 text-gray-900 dark:text-gray-100">Lista de Alunos</h3>

                        <label className="block mb-4">
                            <span className="text-gray-700 dark:text-gray-300">Escolha a data:</span>
                            <input
                                type="date"
                                value={dataSelecionada}
                                onChange={e => setDataSelecionada(e.target.value)}
                                className="mt-1 block w-40 rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            />
                        </label>

                        {alunos.map(aluno => (
                            <div key={aluno.id} className="flex items-center justify-between mb-2">
                                <span className="text-gray-900 dark:text-gray-100">{aluno.nome}</span>
                                <label className="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        checked={presencas[aluno.id] || false}
                                        onChange={() => handleCheckboxChange(aluno.id)}
                                        className="form-checkbox"
                                    />
                                    <span className="text-sm">Presente</span>
                                </label>
                            </div>
                        ))}

                        <div className="flex mt-6 gap-4">
                            <button
                                onClick={handleSubmit}
                                className="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
                            >
                                Salvar Presenças
                            </button>

                            <button
                                onClick={handleExportarPdf}
                                className="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700"
                            >
                                Exportar PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}




