import React from 'react'
import LevelDetails from './LevelDetails'

const TreeDetails = (props) => {

    return (
        <React.Fragment>
            <div style={{ 
                display: "flex", 
                flexDirection: "column",
                marginRight:"3rem"
                }}>
                {(props.children).map((child, index) =>
                    <LevelDetails
                        key={child.id}
                        child={child}
                        index={index}
                        len = {props.children.length}
                    />
                )}
            </div>
        </React.Fragment>
    )
}

export default TreeDetails