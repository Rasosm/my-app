function  Sq({bg, cross}) {
    return (
        <div className="s" style={{
            width: '100px',
            heigth: '100px', 
            backgroundColor: bg
        }}>
            <strong style={{
                color: cross
            }}>+</strong>
        </div>
    )
}
export default Sq;