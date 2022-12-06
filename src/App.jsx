import { useState } from 'react';
import './App.scss';

function App() {
    const [line, setLine] = useState([]);

    const add = () => {
        setLine((line) => [...line, { transform: 'rotate(10deg)' }]);
    };

    const destroy = () => {
        setLine((line) => [...line].slice(0, -1));
    };
    const left = () => {
        setLine((line) => [
            ...line,
            {
                backgroundColor: 'white',
            },
        ]);
    };

    return (
        <div className="App">
            <div className="App-header">
                <div className="bin">
                    {line.map((line) => (
                        <div
                            className="line"
                            style={{
                                backgroundColor: 'crimson',
                                width: '5px',
                                height: '50px',
                                margin: '10px',
                            }}
                            key={line.id}
                        ></div>
                    ))}
                </div>
                <button onClick={add}>ADD</button>
                <button onClick={destroy}>Remove</button>
                <button onClick={left}>Left</button>
                <button>Right</button>
            </div>
        </div>
    );
}

export default App;
