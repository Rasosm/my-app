import { useState } from 'react';
import './App.scss';

function App() {
    const [color, setColor] = useState('crimson');

    const now777 = (a) => {
        console.log('NOW is ' + a);
    };
    const change = () => {
        setColor('skyblue');
    };
    return (
        <div className="App">
            <div className="App-header">
                <h1 style={{ color: color }}>Bebras</h1>
                <button onClick={change}>Do Color</button>
                <button onClick={() => now777('9:00')}>Press on 9:00 PM</button>
                <button onClick={() => now777('10:00')}>
                    Press on 10:00 PM
                </button>
                <button onClick={now777}>Press on 11:00 PM</button>
                <button onClick={() => console.log('NOW!!!!!')}>
                    Press on 07:00 PM
                </button>
            </div>
        </div>
    );
}

export default App;
