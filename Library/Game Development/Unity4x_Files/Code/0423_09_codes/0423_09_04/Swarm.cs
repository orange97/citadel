// file: Swarm
using UnityEngine;
using System.Collections;
using System.Collections.Generic;

public class Swarm : MonoBehaviour {
	public int droneCount = 20;
	public GameObject dronePrefab;

	private List<Drone> drones = new List<Drone>();

	private void Awake(){
		for (int i = 0; i < droneCount; i++){
			AddDrone();
		}
	}
	
	private void AddDrone(){
		GameObject newDroneGO = (GameObject)Instantiate(dronePrefab);
		Drone newDrone = newDroneGO.GetComponent<Drone>();
		drones.Add( newDrone );

		float speed = 5f;
		float maxSpeed = 10f;
		float maxDirectionChange = .05f;
		newDrone.SetParameters(speed, maxSpeed, maxDirectionChange);
	}
	
	private void FixedUpdate(){
		Vector3 swarmCenter = SwarmCenterAverage();
		Vector3 swarmMovement = SwarmMovementAverage();
		
		foreach(Drone drone in drones ) {
			drone.UpdateVelocity(swarmCenter, swarmMovement);
		}
	}
	
	private Vector3 SwarmCenterAverage() {
		// cohesion (swarm center point)
		Vector3 locationTotal = Vector3.zero;

		foreach(Drone drone in drones ) {
			locationTotal += drone.transform.position;
		}
		
		return (locationTotal / drones.Count);
	}
	
	private Vector3 SwarmMovementAverage() {
		// alignment (swarm direction average)
		Vector3 velocityTotal = Vector3.zero;

		foreach(Drone drone in drones ) {
			velocityTotal += drone.rigidbody.velocity;
		}

		return (velocityTotal / drones.Count);	
	}	
}
