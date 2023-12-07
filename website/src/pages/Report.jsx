import React, { useState, useEffect } from 'react';
import axios from '../axios';
import { useAuth } from '../contexts/AuthContext';

export default function Report() {
    const { user } = useAuth();
    const [data, setData] = useState([]);

    useEffect(() => {
        // Fetch data from the API
        const fetchData = async () => {
            try {
                const response = await axios.get('/api/report', {
                    headers: {
                        Authorization: `Bearer ${user.token}`,
                    }
                });
                setData(response.data);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        };

        fetchData();
    }, []); // Empty dependency array ensures the effect runs only once on mount

    return (
        <>
            <div className="text-6xl font-bold text-slate-600">Report Table</div>
            <hr className="bg-slate-400 h-1 w-full my-4" />

            <table className="table-auto">
                <thead>
                    <tr>
                        <th className="px-4 py-2">Campaign ID</th>
                        <th className="px-4 py-2">Cost</th>
                        <th className="px-4 py-2">Total Revenue</th>
                        <th className="px-4 py-2">Profit</th>
                    </tr>
                </thead>
                <tbody>
                    {data.map((row) => (
                        <tr key={row.campaign_id + Math.random()}>
                            <td className="border px-4 py-2">{row.campaign_id}</td>
                            <td className="border px-4 py-2">{row.cost_amount}</td>
                            <td className="border px-4 py-2">{row.total_revenue}</td>
                            <td className="border px-4 py-2">{row.profit}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </>
    );
}
