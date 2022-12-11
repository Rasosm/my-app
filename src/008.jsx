import { useState } from 'react';
import './App.scss';

function App() {
    const [line, setLine] = useState(true);

    const add = () => {
        setLine((line) => !line);
    };

    const destroy = () => {
        setLine((line) => []);
    };

    const left = () => {
        [
            ...line,
            {
                transform: line ? '0%' : 'rotate(-10deg)',
             },
        ]);
    };
  
    const right = () => {
        [
            ...line,
            {
                transform: line ? '0%' : 'rotate(10deg)',
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
                                transform: line ? '0%' : 'rotate(10deg)',
                                backgroundColor: 'crimson',
                                width: '5px',
                                height: '50px',
                                margin: '10px',
                            }}
                            key={line.id}
                        >
                            {line.id}
                        </div>
                    ))}
                </div>
                <button onClick={add}>ADD</button>
                <button onClick={destroy}>Remove</button>
                <button onClick={left}>Left</button>
                <button onClick={right}>Right</button>
            </div>
        </div>
    );
}

export default App;
