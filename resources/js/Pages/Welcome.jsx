import React from "react";
import { Head, Link } from "@inertiajs/react";
import { route } from "ziggy-js";

export default function Welcome({ auth }) {
    const currentYear = new Date().getFullYear();
    const appName = import.meta.env.VITE_APP_NAME || "Seu Gerenciador de alunos";

    return (
        <>
            <Head title="Home" />

            <div className="bg-gradient-to-r from-purple-500 to-blue-900 min-h-screen flex flex-col justify-center items-center text-white">
                <header className="text-center">
                    <h1 className="text-3xl font-bold mb-6">
                        Gerencie os seus alunos com eficiência!
                    </h1>
                    <p className="text-lg mb-10">
                        Controle as faltas, organize o diário e mantenha os pais informados..
                    </p>
                </header>

                <div className="flex justify-center space-x-4">
                    {auth.user ? (
                        <Link
                            href={route("alunos.index")}
                            className="bg-purple-900 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition duration-300"
                        >
                            Painel de Controle
                        </Link>
                    ) : (
                        <>
                            <Link
                                href={route("login")}
                                className="bg-purple-500 hover:bg-purple-600 text-white font-semibold py-2 px-4 rounded transition duration-300"
                            >
                                Acessar
                            </Link>

                            <Link
                                href={route("register")}
                                className="bg-blue-900 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-300"
                            >
                                Cadastrar
                            </Link>
                        </>
                    )}
                </div>

                <section className="mt-12 flex flex-col md:flex-row justify-center items-center space-y-6 md:space-y-0 md:space-x-6">
                    <div className="bg-white text-black p-6 rounded-lg shadow-lg w-72 text-center">
                        <h3 className="font-bold text-xl mb-4">Gestão de Alunos</h3>
                        <p>Monitore todos os alunos da sua sala, garantindo transparência e controle.</p>
                    </div>

                    <div className="bg-white text-black p-6 rounded-lg shadow-lg w-72 text-center">
                        <h3 className="font-bold text-xl mb-4">Comunicação Eficiente</h3>
                        <p>Mantenha os pais informados com comunicados e convocações de comparencia a escola.</p>
                    </div>

                    <div className="bg-white text-black p-6 rounded-lg shadow-lg w-72 text-center">
                        <h3 className="font-bold text-xl mb-4">Relatórios e Documentos</h3>
                        <p>Acesse relatórios e documentos dos alunos com facilidade.</p>
                    </div>
                </section>

                <footer className="mt-16 text-center">
                    <p>
                        @ {currentYear} {appName}. Todos os direitos reservados.
                    </p>
                </footer>
            </div>
        </>
    );
}
