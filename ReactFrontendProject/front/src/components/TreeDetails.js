import React from 'react'
import LevelDetails from './LevelDetails'

const TreeDetails = (props) => {

    return (
        <React.Fragment>
            {(props.children).map((child) =>
                <LevelDetails
                    key={child.id}
                    child={child}
                />
            )}
            <hr />
        </React.Fragment>
    )
}

export default TreeDetails