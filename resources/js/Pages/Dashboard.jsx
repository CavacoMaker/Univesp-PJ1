import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Alunos() {
    const abrirSala = (sala) => {
        window.open(`/salas/${sala}`, '_blank');
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Alunos
                </h2>
            }
        >
            <Head title="PJ1" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            <p className="mb-4">Você está logado!</p>
                            <div className="space-x-4">
                                <button
                                    onClick={() => abrirSala('sala1')}
                                    className="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                                >
                                    Sala 1
                                </button>
                                <button
                                    onClick={() => abrirSala('sala2')}
                                    className="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600"
                                >
                                    Sala 2
                                </button>
                                <button
                                    onClick={() => abrirSala('sala3')}
                                    className="px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600"
                                >
                                    Sala 3
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}