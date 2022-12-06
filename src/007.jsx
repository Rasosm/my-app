import { useState } from 'react';
import './App.scss';
import randColor from './Functions/randColor';
import rand from './Functions/rand';
import Sq from './Components/006/Sq';

function App() {
    const [sq, setSq] = useState([]);

    const add = () => {
        setSq((s) => [...s, { id: rand(100000, 999999), color: randColor() }]);
    };

    return (
        <div className="App">
            <div className="App-header">
                <div className="bin">
                    {/* {sq.map((sq) => (
                        <div
                            className="sq"
                            style={{
                                backgroundColor: sq.color,
                            }}
                            key={sq.id}
                        >
                            {sq.id}
                        </div>
                    ))} */}

                    {sq.map((square) => (
                        <Sq key={square.id} square={square} setSq={setSq} />
                    ))}
                </div>
                <button onClick={add}>ADD</button>
                <h2>labas</h2>
            </div>
        </div>
    );
}

export default App;
