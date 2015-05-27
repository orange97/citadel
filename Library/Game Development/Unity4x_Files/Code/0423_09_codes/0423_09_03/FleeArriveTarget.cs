// file: FleeArriveTarget.cs
using UnityEngine;
using System.Collections;

public class FleeArriveTarget : MonoBehaviour {
	public GameObject playerGO;
	public const float MAX_SPEED = 500.0f;
	public const float DECELERATION_FACTOR = 0.6f;
	public const float FLEE_RADIUS = 14f;
	public const float SEEK_RADIUS = 6f;
	
	private float maxSpeedForFrame = 1;

	private void FixedUpdate () {
		maxSpeedForFrame = MAX_SPEED * Time.deltaTime;
		Vector3 source = transform.position;
		Vector3 target = playerGO.transform.position;

		Vector3 adjustVelocity = Vector3.zero;

		float distanceToTarget = Vector3.Distance(target, source);
		if( distanceToTarget < FLEE_RADIUS )
			adjustVelocity += Flee(source, target);
			
		if( distanceToTarget > SEEK_RADIUS )
			adjustVelocity += Arrive(source, target);
		
		adjustVelocity = UsefulFunctions.ClampMagnitude( adjustVelocity, maxSpeedForFrame);
		rigidbody.AddForce( adjustVelocity );
		
		transform.LookAt( playerGO.transform );
		UsefulFunctions.DebugRay(transform.position, rigidbody.velocity, Color.yellow);
		UsefulFunctions.DebugRay(transform.position, adjustVelocity, Color.blue);
	}

	
	private Vector3 Flee(Vector3 source, Vector3 target){
		float distanceToTarget = Vector3.Distance(target, source);
		Vector3 directionAwayFromTarget = Vector3.Normalize(source - target);
		float speed = (FLEE_RADIUS - distanceToTarget) / DECELERATION_FACTOR;
		Vector3 velocityAwayFromTarget = speed * directionAwayFromTarget;
		return velocityAwayFromTarget;
	}

	private Vector3 Arrive(Vector3 source, Vector3 target){				
		float distanceToTarget = Vector3.Distance(source, target);
		Vector3 directionToTarget = Vector3.Normalize( target - source );
		float speed = distanceToTarget / DECELERATION_FACTOR;
		Vector3 velocityToTarget = speed * directionToTarget;
		
		return velocityToTarget - rigidbody.velocity;
	}

}
