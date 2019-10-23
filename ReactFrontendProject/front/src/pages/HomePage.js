import React from 'react'
import useGlobal from '../store/store'
import TreeDetails from '../components/TreeDetails'

const Home = () => {
    const [globalState] = useGlobal();

    return (
        <div className="central-wrapper">
            <div style= {{display:"inline-flex"}}>
            {Array.apply(null, { length: globalState.tree.size }).map((e, index) => {
                if (globalState.tree.get(index)) return <TreeDetails
                    key={index}
                    level={index + 1}
                    children={globalState.tree.get(index)}
                />
                return null
            }
            )}
            </div>
        </div>
    )
}

export default Home